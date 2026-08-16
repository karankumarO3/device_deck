function showContent(sectionId, btn) {
    var contents = document.querySelectorAll('.content');
    contents.forEach(function(content) {
        content.classList.remove('active');
    });

    var contentToShow = document.getElementById(sectionId);
    contentToShow.classList.add('active', 'genie-effect');

    setTimeout(function() {
        contentToShow.classList.remove('genie-effect');
    }, 500);

    var buttons = document.querySelectorAll('.left-sidebar button');
    buttons.forEach(function(button) {
        button.style.opacity = '0.5';
    });

    btn.style.opacity = '1';
}