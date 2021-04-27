// $(document).ready()
// {
//     $(function () {
//         $(window).on('scroll', function () {
//             if ( $(window).scrollTop() > top ) {
//                 $('.navbar').addClass('active');
//             } else {
//                 $('.navbar').removeClass('active');
//             }
//         });
//     });
// };

$(document).ready(function(){

    $(window).on("scroll",function() {

        if($(this).scrollTop() > 500)

            $(".navbar").addClass("active");

        else

            $(".navbar").removeClass("active");


    })
})
