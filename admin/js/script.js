/**
 * Created by Mahfuz on 12-Nov-18.
 */
$(document).ready(function () {
    ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
        console.error( error );
} );
});