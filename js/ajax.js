/**
 * Created by mater on 14.06.2017.
 */
$.ajax({
    url: "some.php",
    success: function(data){
        alert( "Прибыли данные: " + data );
    }
});
