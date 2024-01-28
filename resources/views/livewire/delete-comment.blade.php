<x-modal-confirm
    livewireToOpenModal="deleteCommentWasSet"
    toCloseModal="commentWasDeleted"
    modalTitle="Delete Comment"
    modalDescription="Are you sure you want to delete this comment? This action cannot be undone."
    confirmButton="Delete"
    wireClickMethod="deleteComment"
/>