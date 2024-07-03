<script>
    $(document).ready(function() {
        let success= @json(session()->has('message')) ;
        if (success) {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',

                iconColor: 'white',
                customClass: {
                    popup: 'colored-toast',
                },
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
                });
                Toast.fire({
                    icon: "{{ session()->get('icon') }}",
                    title: "{{ session()->get('message') }}",
                    color: 'red',
                })
            }


    });

 </script>
