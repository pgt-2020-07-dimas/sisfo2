$(function() {
    var pathx = window.location.href; // Mengambil data URL pada Address bar
    var path = this.href;
    alert(path);
    alert(parh2);
    $('nav li').each(function() {
        // Jika URL pada menu ini sama persis dengan path...
        if (this.href === path) {

            // Tambahkan kelas "active" pada menu ini
            $(this).addClass('active');
        }
    });
});