import { Modal } from 'flowbite';
import { Chart } from 'chart.js/auto';

const csrf_token = $('meta[name="csrf-token"]').attr('content');

$(document).ready(function(){
    $("#hitung").submit(function(e){
        e.preventDefault();

        var bb = $('#berat_badan').val();
        var tb = $('#tinggi_badan').val(); 
        var bmi = (bb / Math.pow((tb/100), 2)).toFixed(2);
        var kategori = "";

        if (bmi < 19) {
            kategori = "Berat badan kurang"
        }
        if (bmi < 25) {
            kategori = "Berat badan Normal"
        }
        if (bmi < 30) {
            kategori = "Kelebihan berat badan"
        }
        if (bmi < 35) {
            kategori = "Obesitas tingkat 1"
        }
        if (bmi < 35) {
            kategori = "Obesitas tingkat 2"
        }
        else {
            kategori = "Obesitas tingkat 3"
        }

        console.log(bmi);
        $("#hasil_bmi").text(bmi);
        $('#kategori_bmi').text(kategori);

        var $smallModal =  document.getElementById('small-modal');
        const smallModal = new Modal($smallModal);

        smallModal.show();
    });

    $('.form-catatanku').submit(function(e){
        e.preventDefault();
        var data = new FormData(this);
        data.append('_token', csrf_token);
        var form = $(this).closest('.modal');
        $(".submit-catatanku").attr("disabled", true);
        $(this).closest('.modal-form').addClass('hidden');

        var $loadingModal =  document.getElementById('loading-modal');
        const modal = new Modal($loadingModal);

        modal.show();

        $.ajax({
            url : "/catatanku/input",
            type: 'POST',
            data: data,
            contentType: false,
            processData: false,
            success: function(response){
                console.log('berhasil menyimpan');
                modal.hide();
                $('#toast-success').removeClass('hidden');
                $('#toast-success .message').text('Catatan berhasil ditambahkan.');

                setTimeout(function() {
                    location.reload();
                }, 1500);
            },
            error: function(error){
                console.error(error);
                modal.hide();
                $('#toast-danger').removeClass('hidden');
                $('#toast-danger .message').text('Catatan gagal ditambahkan.');

            },
        });
    });

    $('.delete-catatan').click(function(e) {
        e.preventDefault();

        var deleteUrl = $(this).attr('href');
        var itemToDelete = $(this).closest('.container-catatan-makanan');

        $('#confirm-hapus').click(function(){
            $.ajax({
                type: 'DELETE',
                url: deleteUrl,
                data: {
                    _token : csrf_token
                },
                success: function(data){
                    console.log('berhasil menghapus catatan makanan');
    
                    $('#toast-success').removeClass('hidden');
                    $('#toast-success .message').text('Catatan berhasil dihapus.');
                    setTimeout(function() {
                        $('#toast-success').addClass('hidden');
                    }, 3000);
    
                    itemToDelete.remove();
                },
                error: function (error) {
                    console.error(error);
                    $('#toast-danger .message').text('Catatan gagal dihapus.');
                    setTimeout(function() {
                        $('#toast-danger').addClass('hidden');
                    }, 3000);
                }
            });
        });
    });

    $('.delete-bmi').click(function(e) {
        e.preventDefault();

        var deleteUrl = $(this).attr('href');
        var itemToDelete = $(this).closest('.container-bmi');

        $('#confirm-hapus').click(function(){
            $.ajax({
                type: 'DELETE',
                url: deleteUrl,
                data: {
                    _token : csrf_token
                },
                success: function(data){
                    console.log('berhasil menghapus BMI');

                    $('#toast-success').removeClass('hidden');
                    $('#toast-success .message').text('BMI berhasil dihapus.');
                    setTimeout(function() {
                        $('#toast-success').addClass('hidden');
                    }, 3000);

                    itemToDelete.remove();
                },
                error: function (error) {
                    console.error(error);
                    $('#toast-danger').removeClass('hidden');
                    $('#toast-danger .message').text('BMI gagal dihapus. ' + error.responseJSON.message);
                    setTimeout(function() {
                        $('#toast-danger').addClass('hidden');
                    }, 3000);
                }
            });
        });
    });

    $('#tbl-chart').click(function(){
        $('#bmiChart').show();
        $('#calculator').hide();
    })

    $('#tbl-kalkulator').click(function(){
        $('#bmiChart').hide();
        $('#calculator').show();
    })

    $('#tbl-donat').click(function(){
        $('#open-donat').removeClass('hidden');
        $('#open-modal').hide();
    })

    $('#tbl-catatanku').click(function(){
        $('#open-donat').addClass('hidden');
        $('#open-modal').show();
    })

    $('#gambar').change(function(){
        $('#edit-profile-form').submit();
    })

    $('#remove-pp').click(function(e) {
        e.preventDefault();

        var deleteUrl = '/profile/hapus-gambar';

        $.ajax({
            type: 'PATCH',
            url: deleteUrl,
            data: {
                _token : csrf_token
            },
            success: function(data){
                console.log('berhasil mengubah gambar');

                location.reload();
            },
            error: function (error) {
                console.error(error);
                $('#toast-danger').removeClass('hidden');
                $('#toast-danger .message').text('BMI gagal dihapus. ' + error.responseJSON.message);
                setTimeout(function() {
                    $('#toast-danger').addClass('hidden');
                }, 3000);
            }
        });
    });

    $('#form-cari-makanan').submit(function(){
        setTimeout(function() {
            $('#muter').addClass('animate-spin');
            $('#sedang-mencari').removeClass('hidden');
        }, 2500);
    })

    $('#form-add-makanan').submit(function(e){
        e.preventDefault();

        var data = new FormData(this);
        data.append('_token', csrf_token);

        var $modal =  document.getElementById('modal-add-makanan');
        const modal = new Modal($modal);

        var berhasilMessage = "Makanan berhasil ditambahkan";
        var gagalMessage = "Makanan gagal ditambahkan";
        var url = "/admin/makanan";
        if ($("#input-id-makanan").val() != ""){
            var url = "/admin/makanan/edit";
            berhasilMessage = "Makanan berhasil diubah"
            gagalMessage = "Makanan gagal diubah"

        }

        $.ajax({
            url : url,
            type: 'POST',
            data: data,
            contentType: false,
            processData: false,
            success: function(response){
                console.log('berhasil menyimpan');
                modal.hide();
                $('#toast-success .message').text(berhasilMessage);
                $('#toast-success').removeClass('hidden');

                setTimeout(function() {
                    location.reload();
                }, 700);
                modal.hide()
            },
            error: function(error){
                console.error(error);
                modal.hide();
                $('#toast-danger .message').text(gagalMessage);
                $('#toast-danger').removeClass('hidden');

            },
        });
    });

    $('.hapus-makanan').click(function(e){
        e.preventDefault();

        var deleteUrl = $(this).attr('href');
        var itemToDelete = $(this).closest('tr');

        $('#confirm-message').text("Data makanan yang telah dihapus tidak dapat dikembalikan");

        $('#confirm-hapus').click(function(){
            $.ajax({
                type: 'DELETE',
                url: deleteUrl,
                data: {
                    _token : csrf_token
                },
                success: function(data){
                    console.log('berhasil menghapus Makanan');

                    $('#toast-success').removeClass('hidden');
                    $('#toast-success .message').text('Makanan berhasil dihapus.');
                    setTimeout(function() {
                        $('#toast-success').addClass('hidden');
                    }, 3000);

                    itemToDelete.remove();
                },
                error: function (error) {
                    console.error(error);
                    $('#toast-danger').removeClass('hidden');
                    $('#toast-danger .message').text('Makanan gagal dihapus. ' + error.responseJSON.message);
                    setTimeout(function() {
                        $('#toast-danger').addClass('hidden');
                    }, 3000);
                }
            });
        });
    });

    $('#btn-add-makanan').click(function(){
        $('#input-id-makanan').val("");
        $('#nama').val("");
        $('#deskripsi').val("");
        $('#old_gambar').val("");
        $('#karbohidrat').val("");
        $('#protein').val("");
        $('#gula').val("");
        $('#garam').val("");
        $('#lemak').val("");
        $('#previewImage').attr('src', "");
        $('#previewImage').addClass("hidden");
        $('#submit-makanan').text('+ Tambah Makanan')
    });
    
    $('.edit-makanan').click(function(e){
        e.preventDefault();

        $('#judul-modal').text('Edit data makanan');
        $('#ganti-gambar').removeClass('hidden');
        $('#submit-makanan').text('Ubah makanan');

        var getUrl = "/admin/makanan/" + $(this).attr('data-id');

        $.ajax({
            url: getUrl,
            type: 'GET',
            success: function(response){
                console.log(response);
                $('#input-id-makanan').val(response.id);
                $('#nama').val(response.nama);
                $('#deskripsi').val(response.deskripsi);
                $('#old_gambar').val(response.gambar);
                $('#karbohidrat').val(response.karbohidrat);
                $('#protein').val(response.protein);
                $('#gula').val(response.gula);
                $('#garam').val(response.garam);
                $('#lemak').val(response.lemak);
                $('#previewImage').attr('src', response.gambar);
                $('#previewImage').removeClass("hidden");
            },
            error: function(error){
                console.error(error.responseText);
            }
        })


    });
})

$('#gambar-makanan').ready(function() {
    $('#gambar-makanan').on('change', function(event) {
        var input = event.target;
        var reader = new FileReader();

        reader.onload = function() {
            var dataURL = reader.result;
            $('#previewImage').removeClass('hidden')
            $('#ganti-gambar').removeClass('hidden')
            $('#previewImage').attr('src', dataURL);
        };
        reader.readAsDataURL(input.files[0]);

    });
});

$('#bmiChart').ready(function(){
    function createChart(data) {
        var ctx = document.getElementById('bmiChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins:{
                    legend: {
                        position: 'bottom'
                    }
                },
                scales: {
                    x: {
                        display: false
                    },
                }
            }
        });
    }

    $.ajax({
        url: '/bmi/chart-data',
        type: 'GET',
        success: function(response){
            createChart(response);
        },
        error: function(error){
            console.error(error.responseText)
        }
    })
})
