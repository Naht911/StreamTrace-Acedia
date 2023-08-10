<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>
<h2>feedback</h2>
<div style="width: 70%">
    @if (Session::has('alert'))
        <div class="alert alert-success">
            {{ Session::get('alert') }}
        </div>
    @endif
    <form action="{{ url('dashboard/FAQ/postFAQ') }}" method="POST" enctype="multipart/form-data" id="myForm">
        @csrf

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Question:</label>
            <input type="text" class="form-control" name="question" id="question">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">reply:</label>

        </div>
        <textarea rows="2" cols="100" name="reply" id="reply"></textarea>
        <div> <button type="submit" class="btn btn-primary" id="submit" onclick="checkSubmit()">Submit</button>
        </div>


    </form>
</div>
<script>
    // function checkSubmit() {
    //     if (content == '') {
    //         alert('khong trong');
    //     }
    // }

    function checkSubmit() {
        var content = document.getElementById('content').value;
        var title = document.getElementById('title').value;
        var user = document.getElementById('content').value;
        if (content === '' || title === '' || user === '') {
            alert('Không được để trống nội dung');
            return false; // Chặn việc gửi form nếu nội dung rỗng
        }
        return true; // Gửi form nếu nội dung không rỗng
    }
</script>
