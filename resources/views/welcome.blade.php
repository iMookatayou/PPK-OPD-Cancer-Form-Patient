<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Vue App</title>
  @vite('resources/js/app.js') {{-- ✅ โหลด Vue จาก Vite --}}
</head>
<body>
  <div id="app">
    <router-view></router-view> {{-- ✅ Vue mount ตรงนี้ --}}
  </div>
</body>
</html>
