import { Modal } from 'flowbite';
import { Chart } from 'chart.js/auto';

const csrf_token = $('meta[name="csrf-token"]').attr('content');

$(document).ready(function(){
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

    $('.delete-bmi').click(function(e) {
        e.preventDefault();

        var deleteUrl = $(this).attr('href');
        var itemToDelete = $(this).closest('.container-bmi');

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

    $('#tbl-chart').click(function(){
        $('#bmiChart').show();
        $('#calculator').hide();
    })

    $('#tbl-kalkulator').click(function(){
        $('#bmiChart').hide();
        $('#calculator').show();
    })
    
})

// Buat fungsi untuk mengambil data dari Laravel melalui AJAX
async function fetchData() {
    const response = await fetch('/bmi/dataforchart');
    const data = await response.json();
    return data;
}

// Fungsi untuk membuat grafik
async function createChart() {
    const data = await fetchData();

    var ctx = document.getElementById('bmiChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: data,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins:{
                legend: {
                    position: 'top'
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

// Panggil fungsi untuk membuat grafik saat halaman dimuat
createChart();