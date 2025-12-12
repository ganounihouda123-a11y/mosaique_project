@extends('layouts.app')


<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Register</h1>

    <form action="/register" method="POST" class="space-y-4">
        @csrf
        <div>
            <label>Fullname</label>
            <input type="text" name="name" class="w-full border rounded p-2" required>
        </div>
        <div>
            <label>Email</label>
            <input type="email" name="email" class="w-full border rounded p-2" required>
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password" class="w-full border rounded p-2" required>
        </div>
        <div>
            <label>Role</label>
            <select name="role" class="w-full border rounded p-2" required>
                <option value="">choisir le role</option>
                <option value="admin">Admin</option>
                <option value="commercial">Commercial</option>
                <option value="controleur">Controleur</option>
            </select>
        </div>
        <button type="submit" class="bg-sky-600 text-white px-4 py-2 rounded">register</button>
    </form>
</div>
<div>
     <h2>Log in</h2>
   <form action="/login" method="POST">
    @csrf
    <input type="text" name="loginname" placeholder="name">
   
    <input type="password" name="loginpassword" placeholder="password">
    <button>Log in</button>
   </form>
</div>

