function toggleSearch()
{
    var panel = document.getElementById('searchboxpanel');
    var btn = document.getElementById('opensearchbutton');
    if(panel.clientWidth == 0)
    {
        panel.style.display = 'block';
        btn.style.display = 'none';
    }
    else
    {
        panel.style.display = 'none';
        btn.style.display = 'block';
    }
}
 
document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('#opensearchbutton').addEventListener('click', toggleSearch);
    document.querySelector('#closesearchbutton').addEventListener('click', toggleSearch);
});