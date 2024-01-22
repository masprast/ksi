SELECT NamaMahasiswa AS Mahasiswa,
    NamaMataKuliah AS 'Mata Kuliah',
    Grade
FROM tmahasiswa
    JOIN tmahasiswa ON tmahasiswa.NIRM = tnilai.NIRM
    JOIN tmatakuliah ON tmatakuliah.KodeMK = tnilai.KodeMK
WHERE (
        DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), TglLahir)), '%Y') + 0
    ) > 25
    AND tnilai.Grade < 60