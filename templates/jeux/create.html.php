



<a href="index.php" class="btn d-flex align-items-center"><span class="material-symbols-outlined me-1">arrow_back</span>retour</a>

<form
        style="background-color: rgba(29,27,27,0)"
        enctype="multipart/form-data"
        action="?type=jeux&action=create"
        method="post"
        class="d-flex flex-column align-items-center">
    <!---->

    <input style="background-color: rgba(29,27,27,0)" class="form-control mb-2 text-center" type="text" name="title" placeholder="title">
    <input style="background-color: rgba(29,27,27,0)" class="form-control mb-2 text-center" type="text" name="content" placeholder="content">
    <input style="background-color: rgba(29,27,27,0)" class="form-control mb-2 text-center" type="file" name="imageJeux">

    <button class="btn btn-success" type="submit">Ok</button>
</form>