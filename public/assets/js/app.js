(() => {
    setTimeout(() => {
        const postId = window.location.hash.replace("#", "");
        const post = document.querySelector(`#${postId}`);

        post.style.border = "1px solid #34d399";

        post.scrollIntoView({
            behavior: "smooth",
            block: "center",
        });
    }, 500);
})();
