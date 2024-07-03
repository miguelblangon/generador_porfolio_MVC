<script>
    $(document).ready(function() {
        let success={!! session()->has('message') !!};
            if (success) {
                const Toast = Swal.mixin({
                toast: true,
                position: 'center',
                iconColor: 'white',
                customClass: {
                    popup: 'colored-toast',
                },
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
                })
                Toast.fire({
                    icon: "{{ session()->get('icon') }}",
                    title: "{{ session()->get('message') }}"
                });
            }
    })
     </script>
