
function openPost(){
$(document).ready(function() {
    $(".post-container").click(function() {
        // Verifica se o post já está expandido (como um overlay)
        if (!$(this).hasClass("overlayed")) {
            // Remove a classe "overlayed" dos outros posts
            $(".post-container ").not(this).removeClass("overlayed");
            // Adiciona a classe "overlayed" ao post clicado
            $(this).addClass("overlayed");
            // Carregue os comentários via AJAX dentro deste post
            /*var postId = $(this).data("postid");
            $(this).find(".comentarios").load("carregar_comentarios.php?post_id=" + postId);*/
        }
    });
});
}

export { openPost };