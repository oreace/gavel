        $(document).ready(function() {
            var sel = $(".selectProf option:selected").val();
            $('.selectProf').on('change', function() {
                    var sel = $(".selectProf option:selected").val();
                    if (sel == 2) {
                        $('.prof-type').removeClass('hidden');
                    } else {
                        $('.prof-type').addClass('hidden');

                    }
                    console.log(sel);
                })
                // var opt = sel.val();
        })













        