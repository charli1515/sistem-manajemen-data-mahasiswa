<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pilih Fakultas dan Program Studi</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>Pilih Fakultas dan Program Studi</header>

  <div class="container">
    <form action="input-data.php" method="GET">
      <label for="fakultas">Fakultas:</label>
      <select name="fakultas" required>
        <option value="">-- Pilih Fakultas --</option>
        <option value="FIP">Fakultas Ilmu Pendidikan (FIP)</option>
        <option value="Teknik">Fakultas Teknik</option>
        <option value="FIK">Fakultas Ilmu Keolahragaan (FIK)</option>
        <option value="FBS">Fakultas Bahasa dan Seni (FBS)</option>
        <option value="FMIPA">Fakultas Matematika dan IPA (FMIPA)</option>
        <option value="FIS">Fakultas Ilmu Sosial</option>
        <option value="FE">Fakultas Ekonomi</option>
      </select>

      <label for="jurusan">Jurusan:</label>
      <input type="text" name="jurusan" required>

      <label for="prodi">Program Studi:</label>
      <input type="text" name="prodi" required>

      <button type="submit">Lanjut</button>
    </form>
  </div>
</body>
</html>
