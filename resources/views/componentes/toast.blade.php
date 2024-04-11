<script>
    $(document).ready(function() {
        let success={!! session()->has('message') !!};
            if (success) {
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 4000
                });
                Toast.fire({
                    icon: "{{ session()->get('icon') }}",
                    title: "{{ session()->get('message') }}"
                });
            }
    })
     </script>
