<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Form Data (POST) - Modern</title>

    <link rel="stylesheet" href="style.css">
<body>
    <div class="card">
        <h2>Form Input Data Mahasiswa</h2>
        <p>Muhamad Farid Alfarizi - A12.2024.07218</p>

        <form id="myForm" action="simpanDataMhs.php" method="POST">
            <label>NIM</label>
            <input type="text" name="nim" id="nim" placeholder="A00.0000.00000" required>
            <label>Nama</label>
            <input type="text" name="nama" id="nama" required>
            <label>Tempat Lahir</label>
            <input type="text" name="tempatLahir" id="tempat_lahir" required>
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggalLahir" id="tanggal_lahir" required>
            <label>Jumlah Saudara</label>
            <input type="number" name="jmlSaudara" id="jml_saudara" required>
            <label>Alamat</label><br>
            <textarea name="alamat" id="alamat" rows="5" cols="50"></textarea>
            <label>Kota</label>
            <select name="kota" id="kota">
                <option value="">Pilih Kota</option>
                <option>Semarang</option>
                <option>Solo</option>
                <option>Salatiga</option>
                <option>Kudus</option>
                <option>Pekalongan</option>
            </select>

            <label>Jenis Kelamin</label>
            <div class="group-inline">
                <input type="radio" name="jk" value="L" required> Laki-laki
                <input type="radio" name="jk" value="P" required> Perempuan
            </div>

            <label>Status</label>
            <div class="group-inline">
                <input type="radio" name="statusKeluarga" value="K" required> Kawin
                <input type="radio" name="statusKeluarga" value="B" required> Belum Kawin
            </div>
            
            <label>Hobi</label>
            <div class="group-inline">
                <input type="checkbox" name="hobi[]" value="Membaca"> Membaca
                <input type="checkbox" name="hobi[]" value="Olahraga"> Olahraga
                <input type="checkbox" name="hobi[]" value="Menonton-film"> Menonton Film
                <input type="checkbox" name="hobi[]" value="Musik"> Musik
                <input type="checkbox" name="hobi[]" value="Traveling"> Traveling
            </div>

            <label>Email</label>
            <input type="email" name="email" id="email" required>

            <label>Password</label>
            <input type="password" name="password" id="password" required>

            <input type="submit" value="Kirim">

        </form>
    </div>

    <script>
        document.getElementById("nim").addEventListener("input", function () {
            this.value = this.value.replace(/[^A-Za-z0-9.]/g, "");
        });

        document.getElementById("myForm").addEventListener("submit", function (e) {
            let pesan = "";
            let required = ["nim", "nama", "tempat_lahir", "tanggal_lahir", "jml_saudara", "alamat", "kota", "email", "password"];

            // Reset error visual
            required.forEach(id => {
                document.getElementById(id).classList.remove("error-field");
            });

            // Validasi umum
            required.forEach(id => {
                let val = document.getElementById(id).value.trim();
                if (val === "") {
                    pesan += `${id.replace("_", " ")} wajib diisi\n`;
                    document.getElementById(id).classList.add("error-field");
                }
            });

            // Validasi nama
            let nama = document.getElementById("nama").value.trim();
            if (nama !== "" && !/^[A-Za-z\s]+$/.test(nama)) {
                pesan += "Nama hanya boleh huruf\n";
                document.getElementById("nama").classList.add("error-field");
            }

            // Validasi angka
            let umur = document.getElementById("jml_saudara").value.trim();
            if (umur !== "" && !/^[0-9]+$/.test(umur)) {
                pesan += "Jumlah Saudara hanya boleh angka\n";
                document.getElementById("jml_saudara").classList.add("error-field");
            }

            // Radio & checkbox
            if (!document.querySelector('input[name="jk"]:checked'))
                pesan += "Pilih jenis kelamin\n";

            if (!document.querySelector('input[name="statusKeluarga"]:checked'))
                pesan += "Pilih status\n";

            if (!document.querySelector('input[name="hobi[]"]:checked'))
                pesan += "Pilih minimal satu hobi\n";

            if (pesan !== "") {
                alert("PERBAIKI KESALAHAN BERIKUT:\n" + pesan);
                e.preventDefault();
            }
        });
    </script>

</body>

</html>