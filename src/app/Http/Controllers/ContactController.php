<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\CreateRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{

    public function showRegisterForm() {
        return view('auth.register');
    }

    public function register(RegisterRequest $request) {

    $data = $request->only(['name', 'email', 'password']);
    $data['password'] = Hash::make($data['password']);
    $user = User::create($data);

    Auth::login($user);

    return redirect('/');
    }

    public function showLoginForm() {
        return view('auth.login');
    }

    public function login(LoginRequest $request) {
        $data = $request->only(['email', 'password']);
        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect('/');
        }
    }

    public function create(Request $request)
    {
    return view('contact.create');
    }

    public function store(CreateRequest $request) {
    $data = $request->only([
        'last_name', 'first_name', 'gender', 'email', 'address', 'building', 'detail', 'message'
    ]);

    $data['tel'] = implode('-', $request->input('tel'));

    Contact::create($data);

    return redirect('/thanks');
    }

    public function confirm(CreateRequest $request) {
        $data = $request->all();
        return view('contact.confirm', compact('data'));
    }

    public function thanks() {
        return view('contact.thanks');
    }

    public function index(Request $request) {
    $query = Contact::query()->with('category');

    if ($request->filled('keyword')) {
        $keyword = $request->input('keyword');
        $query->where(function ($q) use ($keyword) {
        $q->where('last_name', 'like', "%{$keyword}%")
        ->orWhere('first_name', 'like', "%{$keyword}%")
        ->orWhere('email', 'like', "%{$keyword}%");
        });
    }

    if ($request->filled('gender')) {
        $query->where('gender', $request->gender);
    }

    if ($request->filled('inquiry_type')) {
        $query->whereHas('category', function ($q) use ($request) {
            $q->where('content', $request->inquiry_type);
        });
    }

    if ($request->filled('date')) {
        $query->whereDate('created_at', $request->date);
    }

    $contacts = $query->paginate(7)->appends($request->all());

    return view('index', compact('contacts'));
}
}
