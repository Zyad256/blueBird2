<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment Section</title>
    <style>
    .comment-section {
        max-width: 600px;
        margin: 20px auto;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background: #f9f9f9;
    }

    .comment-form {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    #commentInput,
    .comment-form input[type="text"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
    }

    #submitComment {
        align-self: flex-end;
        padding: 8px 20px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    #submitComment:hover {
        background-color: #0056b3;
    }

    #commentsContainer {
        margin-top: 20px;
    }

    .comment {
        margin-bottom: 15px;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background: white;
    }

    .comment h4 {
        margin: 0;
        font-size: 16px;
        color: #007bff;
    }

    .comment p {
        margin: 5px 0 0;
        font-size: 14px;
        color: #555;
    }

    .comment-actions {
        display: flex;
        gap: 10px;
        margin-top: 10px;
    }

    .comment-actions button {
        padding: 5px 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .edit-btn {
        background-color: #ffc107;
        color: #fff;
    }

    .edit-btn:hover {
        background-color: #e0a800;
    }

    .delete-btn {
        background-color: #dc3545;
        color: #fff;
    }

    .delete-btn:hover {
        background-color: #bd2130;
    }
    </style>
</head>

<body>
    <section class="comment-section">
        <h2>Comments</h2>
        <div class="comment-form">
            <input type="text" id="commenterName" placeholder="Your name (e.g., John Doe)" />
            <textarea id="commentInput" placeholder="Write your comment here..."></textarea>
            <button id="submitComment">Post Comment</button>
        </div>
        <div id="commentsContainer"></div>
    </section>
    <script>
    const commentsContainer = document.getElementById('commentsContainer');
    const commentInput = document.getElementById('commentInput');
    const commenterName = document.getElementById('commenterName');
    const submitComment = document.getElementById('submitComment');
    let storedComments = JSON.parse(localStorage.getItem('comments')) || [];

    function renderComments() {
        commentsContainer.innerHTML = '';
        storedComments.forEach((comment, index) => {
            const commentDiv = document.createElement('div');
            commentDiv.classList.add('comment');
            commentDiv.innerHTML = `
                    <h4>${comment.name}</h4>
                    <p>${comment.text}</p>
                    <div class="comment-actions">
                        <button class="edit-btn" data-index="${index}">Edit</button>
                        <button class="delete-btn" data-index="${index}">Delete</button>
                    </div>
                `;
            commentsContainer.appendChild(commentDiv);
        });
    }

    submitComment.addEventListener('click', () => {
        const commentText = commentInput.value.trim();
        const commenter = commenterName.value.trim() || 'Anonymous';
        if (commentText) {
            const newComment = {
                name: commenter,
                text: commentText
            };
            storedComments.push(newComment);
            localStorage.setItem('comments', JSON.stringify(storedComments));
            commentInput.value = '';
            commenterName.value = '';
            renderComments();
        } else {
            alert('Please write something before posting!');
        }
    });

    commentsContainer.addEventListener('click', (event) => {
        const index = event.target.dataset.index;
        if (event.target.classList.contains('edit-btn')) {
            const newText = prompt('Edit your comment:', storedComments[index].text);
            if (newText !== null) {
                storedComments[index].text = newText.trim();
                localStorage.setItem('comments', JSON.stringify(storedComments));
                renderComments();
            }
        } else if (event.target.classList.contains('delete-btn')) {
            if (confirm('Are you sure you want to delete this comment?')) {
                storedComments.splice(index, 1);
                localStorage.setItem('comments', JSON.stringify(storedComments));
                renderComments();
            }
        }
    });

    renderComments();
    </script>
</body>

</html>