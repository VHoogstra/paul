<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<footer class="sticky-footer">
    <div class="text-center">
        <small>Copyright © dezlv.nl 2018 {{ config('app.name', 'Laravel') }}
            V{{ config('app.version', 'Laravel') }}</small>
    </div>
</footer>
<!-- Logout Modal-->
<!-- Bootstrap core JavaScript-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
<!-- Page level plugin JavaScript-->
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<!-- Custom scripts for all pages-->
{{--<script src="/js/sb-admin.min.js"></script>--}}
<!-- Custom scripts for this page-->
{{--<script src="/js/sb-admin-datatables.min.js"></script>--}}
<script>
    var menuState = true;
    $(document).ready(function () {
        console.log(menuState);
    });
    // $('#menuColapase').click();
    $('#menuColapase').click(function () {

        console.log(menuState);
        if (menuState) {
            $('.nav-side-menu').animate({height: '100%'});

            menuState = false;
        } else {
            $('.nav-side-menu').animate({height: '51px'});

            menuState = true;
        }
    });
    // nav-side-menu

</script>
</body>

</html>
