<hr>

<div class="assoc-middle">
    <button class="btn houses-btn" onclick="showDiv('housings', this)">سكن</button>
    <button class="btn associations-btn active" onclick="showDiv('associations', this)">جمعيات</button>
    <button class="btn centers-btn" onclick="showDiv('centers', this)">مراكز</button>
</div>

<style>
    .assoc-middle .btn.active {
        background-color: #92d2f786;
    }
</style>

<script>
    function showDiv(divId, button) {
        // Hide all content divs
        const contentDivs = document.querySelectorAll('.content-div');
        contentDivs.forEach(div => {
            div.style.display = 'none';
        });

        // Show the selected content div
        document.getElementById(divId).style.display = 'block';

        // Remove active class from all buttons
        const buttons = document.querySelectorAll('.assoc-middle .btn');
        buttons.forEach(btn => btn.classList.remove('active'));

        // Add active class to the clicked button
        button.classList.add('active');
    }
</script>
