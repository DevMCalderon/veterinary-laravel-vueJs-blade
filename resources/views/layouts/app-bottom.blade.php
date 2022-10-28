
    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{{ asset('/assets/js/config.js') }}"></script>
    <script src="{{ asset('/assets/vendors/overlayscrollbars/OverlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('/assets/vendors/popper/popper.min.js') }}"></script>
    <script src="{{ asset('/assets/vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/assets/vendors/anchorjs/anchor.min.js') }}"></script>
    <script src="{{ asset('/assets/vendors/is/is.min.js') }}"></script>
    <script src="{{ asset('/assets/vendors/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('/assets/vendors/lodash/lodash.min.js') }}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="{{ asset('/assets/vendors/list.js/list.min.js') }}"></script>
    <script src="{{ asset('/assets/js/theme.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" ></script>

    <script>
      var navbarStyle = localStorage.getItem("navbarStyle");
      if (navbarStyle && navbarStyle !== 'transparent') {
        document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
      }
    </script>
    
    @yield('scripts')
</body>
</html>
