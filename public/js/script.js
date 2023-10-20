document.querySelector('.btn-file').addEventListener('click', () => {
    document.querySelector('#file').click();
});

// $('#file').on("change",function(){
//     // let parent = $(this).closest(".deco-file")
//     $(".file-names").html("");
//     $.each($(this).prop('files'),function(index,file){
//         $(".file-names").append(file.name+"<br>");
//     })

// })