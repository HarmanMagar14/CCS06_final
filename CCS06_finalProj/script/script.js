$(document).ready(function() {
    loadArticles();  // Load articles on page load
});

// Load Articles
function loadArticles() {
    $.get("article_fetch.php", function (data) {
        $("#articleTable").html(data);
    });
}

$(document).on("click", ".editBtn", function () {
    $("#article_id").val($(this).data("id"));
    $("#title").val($(this).data("title"));
    $("#category").val($(this).data("category"));
    $("#content").val($(this).data("content"));S
    $("#source_url").val($(this).data("source_url"));
    $("#date_published").val($(this).data("date_published"));
    $("#status").val($(this).data("status"));
    $('#submit_button').text("Update");
});

// Add or Update Article
$("#articleForm").submit(function (e) {
    e.preventDefault();
    $.post("article_save.php", $(this).serialize(), function (response) {
        alert(response);
        $("#articleForm")[0].reset();
        $("#article_id").val("");
        loadArticles();
    });
});

// Delete Article
$(document).on("click", ".deleteBtn", function () {
    if (confirm("Are you sure you want to delete this article?")) {
        $.post("article_delete.php", { id: $(this).data("id") }, function (response) {
            alert(response);
            loadArticles();
        });
    }
});
