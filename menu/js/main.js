document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('form').addEventListener('submit', function(e) {
        e.preventDefault();
        let kode = document.querySelector('input[name="kode"]').value;
        fetch('fetch_barang.php?kode=' + kode)
            .then(response => response.json())
            .then(data => {
                let row = document.createElement('tr');
                row.innerHTML = `
                    <td>${data.nama_barang}</td>
                    <td>${data.jumlah}</td>
                    <td>${data.harga}</td>
                `;
                document.getElementById('barang-table').querySelector('tbody').appendChild(row);
            });
    });
});