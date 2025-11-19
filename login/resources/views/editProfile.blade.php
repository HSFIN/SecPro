<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profile</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="edit-page">
  <div class="edit-container">
    <div class="card">

      @if(session('success'))
        <div style="color: green; text-align: center; margin-bottom: 10px;">
            {{ session('success') }}
        </div>
      @endif

      @if ($errors->any())
        <div style="color: red; margin-bottom: 10px; text-align: left;">
            <ul style="padding-left: 18px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif

      <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="profile-pic">
            <img src="{{ $user->profile_photo_path ? asset('storage/' . $user->profile_photo_path) : asset('foto/curry.png') }}" alt="Foto Profile">
            <label class="change-btn" for="profile_photo">Change</label>
            <input id="profile_photo" type="file" name="profile_photo" accept="image/*" style="display:none;">
        </div>

        <label for="name" style="display:block; text-align:left; margin-left: 10%; font-weight:bold;">Nama</label>
        <input type="text"
               id="name"
               name="name"
               class="input-text"
               placeholder="Nama"
               value="{{ old('name', $user->name) }}"
               required>

        <label for="email" style="display:block; text-align:left; margin-left: 10%; margin-top:10px; font-weight:bold;">Email</label>
        <input type="email"
               id="email"
               name="email"
               class="input-text"
               placeholder="Email"
               value="{{ old('email', $user->email) }}"
               required>

        <label for="bio" style="display:block; text-align:left; margin-left: 10%; margin-top:10px; font-weight:bold;">Bio</label>
        <textarea id="bio"
                  name="bio"
                  class="input-bio"
                  placeholder="Tell us about yourself (max 250 words)"
                  rows="5">{{ old('bio', $user->bio) }}</textarea>

        <div class="action-buttons">
            <button type="button" class="back-btn" onclick='window.location.href="{{ route("profile") }}"'>Back</button>

            <button type="submit" class="save-btn">Save</button>
        </div>

      </form>
      </div>
  </div>
</body>
</html>