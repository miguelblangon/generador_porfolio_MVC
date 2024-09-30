<script>
    $(document).ready(function() {
       $('#icono').on('change',function(){
           let icono= $('#icono').val();
           $('#ver-icono').html('<i class="'+icono+'"></i>');
       })

   });
</script>
