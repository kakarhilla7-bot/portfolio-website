document.getElementById('blogDropdown').addEventListener('change', function() {
    const selectedValue = this.value;
    if (selectedValue === 'all') {
        window.location.href = 'viewBlog.php';
        } else {
            window.location.href = '?month=' + selectedValue;
        }
});
