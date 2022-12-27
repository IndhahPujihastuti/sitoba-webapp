<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>

<script>
        <?php if ($this->session->flashdata('successLogin')) { ?>
        var isi = <?php echo json_encode($this->session->flashdata('successLogin'))?>;
        Swal.fire({
            icon: 'success',
            title: isi,
            text: 'Silahkan login untuk menuju halaman dashboard',
            confirmButtonColor: '#858796',
        })
        <?php } ?>
</script>

<script>
        <?php if ($this->session->flashdata('successLogout')) { ?>
        var isi = <?php echo json_encode($this->session->flashdata('successLogout'))?>;
        Swal.fire({
            icon: 'success',
            title: isi,
            text: 'Silahkan login kembali untuk melanjutkan',
            confirmButtonColor: '#858796',
        })
        <?php } ?>
</script>

<script>
        <?php if ($this->session->flashdata('successReset')) { ?>
        var isi = <?php echo json_encode($this->session->flashdata('successReset'))?>;
        Swal.fire({
            icon: 'success',
            title: isi,
            text: 'Silahkan login kembali untuk melanjutkan',
            confirmButtonColor: '#858796',
        })
        <?php } ?>
</script>

</body>
</html>