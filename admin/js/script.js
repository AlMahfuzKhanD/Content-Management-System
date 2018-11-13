/**
 * Created by Mahfuz on 12-Nov-18.
 */
$(document).ready(function () {

    $('#selectAllBoxex').click(function(event) {
        if(this.checked){
            $('.checkBoxes').each(function () {
                this.checked = true;
            });
        }else{
            $('.checkBoxes').each(function () {
                this.checked = false;
            });
        }
    });


});

