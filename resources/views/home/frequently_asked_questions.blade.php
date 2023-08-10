<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</head>
<style>
    .container {
        width: 80%;
        max-width: 600px;
        margin: 50px auto;
    }

    button.accordion {
        width: 100%;
        background-color: whitesmoke;
        border: none;
        outline: none;
        text-align: left;
        padding: 15px 20px;
        font-size: 18px;
        color: #444;
        cursor: pointer;
        transition: background-color 0.2s linear;
    }

    button.accordion:after {
        content: '\f055';
        font-family: "fontawesome";
        font-size: 14px;
        float: right;
    }

    button.accordion.is-open:after {
        content: '\f056';
    }

    button.accordion:hover,
    button.accordion.is-open {
        background-color: #ddd;
    }

    .accordion-content {
        background-color: white;
        border-left: 1px solid whitesmoke;
        border-right: 1px solid whitesmoke;
        padding: 0 20px;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.2s ease-in-out;
    }
</style>

<body>
    <div>

    </div>
    <div style="margin: 40px ">
        <div id="item-list">


            <!-- content starts here -->
            <div class="container">

                @foreach ($data as $item)
                    <button class="accordion">{{ $item->question_content }}</button>
                    <div class="accordion-content">
                        <p>
                            {{ $item->reply_content }}
                        </p>
                    </div>
                @endforeach
                {{-- <button class="accordion">Accordian #3</button>
                <div class="accordion-content">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas deleniti molestias
                        necessitatibus quaerat quos incidunt! Quas officiis repellat dolore omnis nihil quo, ratione
                        cupiditate! Sed, deleniti, recusandae! Animi, sapiente, nostrum?
                    </p>
                </div> --}}
            </div>
            <!-- contend ends here -->



        </div>
    </div>
</body>

<script>
    var accordions = document.getElementsByClassName("accordion");

    for (var i = 0; i < accordions.length; i++) {
        accordions[i].onclick = function() {
            this.classList.toggle('is-open');

            var content = this.nextElementSibling;
            if (content.style.maxHeight) {
                // accordion is currently open, so close it
                content.style.maxHeight = null;
            } else {
                // accordion is currently closed, so open it
                content.style.maxHeight = content.scrollHeight + "px";
            }
        }
    }
</script>

</html>
