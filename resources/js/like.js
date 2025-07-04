function likePost(postId) {
    if (localStorage.getItem(`liked_post_${postId}`)) {
        alert("You already liked this post!");
        return;
    }

    fetch(`/posts/${postId}/like`, {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
            Accept: "application/json",
        },
    })
        .then((res) => res.json())
        .then((data) => {
            if (data.success) {
                const countEl = document.getElementById(`like-count-${postId}`);
                const iconEl = document.getElementById(`like-icon-${postId}`);

                countEl.textContent = data.count;

                // Fill heart when liked
                iconEl.setAttribute("fill", "currentColor");
                iconEl.classList.add("text-red-600");

                localStorage.setItem(`liked_post_${postId}`, "true");
            }
        });
}
