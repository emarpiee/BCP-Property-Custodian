<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test</title>

    <!-- Note: Without setting a position type, the top, left, right, and bottom properties will have no effect. -->
    <style>
        .parent {
            background: yellow;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .box1 {
            width: 250px;
            height: 250px;
            font-size: 22px;
            background: green; 
            padding: 50px;
            float: right; /*floats element to the left or right*/
        }

        .box2 {
            width: 250px;
            height: 250px;
            font-size: 22px;
            background: blue;
            padding: 50px;
        }

        #box1 {
            border: 1px;
            width: 300px;
            height: 300px;
            background: green;
            margin-left: auto; 
            margin-right: auto;

            position: relative;
        }

        #box2 {
            border: 1px;
            width: 100px;
            height: 100px;
            background: skyblue;

            position: absolute;
            top: 100px;
            left: 100px;
        }

        #box3 {
            border: 1px;
            width: 200px;
            height: 200px;
            background: aqua;

            position: fixed;
            top: 0;
            margin-left: 50%;
        }

        #box4 {
            border: 1px;
            width: 400px;
            height: 400px;
            background: chartreuse;

            position: sticky;
            top: 0;
            left: 0;
        }

        a:hover {
            text-decoration: none;
            color: tomato;
        } /*pseudo class*/

    </style>
</head>

<body>
   <!--  <p>Lorem ipsum, dolor sit amet consectetur adipisicing, elit. Necessitatibus perspiciatis tenetur adipisci eligendi veniam eos illo numquam facilis commodi nihil obcaecati vitae accusantium magnam aliquid fugit, inventore quidem. Autem, repellendus.</p>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing, elit. Necessitatibus perspiciatis tenetur adipisci eligendi veniam eos illo numquam facilis commodi nihil obcaecati vitae accusantium magnam aliquid fugit, inventore quidem. Autem, repellendus.</p>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing, elit. Necessitatibus perspiciatis tenetur adipisci eligendi veniam eos illo numquam facilis commodi nihil obcaecati vitae accusantium magnam aliquid fugit, inventore quidem. Autem, repellendus.</p>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing, elit. Necessitatibus perspiciatis tenetur adipisci eligendi veniam eos illo numquam facilis commodi nihil obcaecati vitae accusantium magnam aliquid fugit, inventore quidem. Autem, repellendus.</p>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing, elit. Necessitatibus perspiciatis tenetur adipisci eligendi veniam eos illo numquam facilis commodi nihil obcaecati vitae accusantium magnam aliquid fugit, inventore quidem. Autem, repellendus.</p>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing, elit. Necessitatibus perspiciatis tenetur adipisci eligendi veniam eos illo numquam facilis commodi nihil obcaecati vitae accusantium magnam aliquid fugit, inventore quidem. Autem, repellendus.</p>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing, elit. Necessitatibus perspiciatis tenetur adipisci eligendi veniam eos illo numquam facilis commodi nihil obcaecati vitae accusantium magnam aliquid fugit, inventore quidem. Autem, repellendus.</p>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing, elit. Necessitatibus perspiciatis tenetur adipisci eligendi veniam eos illo numquam facilis commodi nihil obcaecati vitae accusantium magnam aliquid fugit, inventore quidem. Autem, repellendus.</p>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing, elit. Necessitatibus perspiciatis tenetur adipisci eligendi veniam eos illo numquam facilis commodi nihil obcaecati vitae accusantium magnam aliquid fugit, inventore quidem. Autem, repellendus.</p>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing, elit. Necessitatibus perspiciatis tenetur adipisci eligendi veniam eos illo numquam facilis commodi nihil obcaecati vitae accusantium magnam aliquid fugit, inventore quidem. Autem, repellendus.</p>

    <div id="box1">
        <div id="box2"></div>
    </div>
    <div id="box3"></div>
    <div id="box4"></div>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing, elit. Necessitatibus perspiciatis tenetur adipisci eligendi veniam eos illo numquam facilis commodi nihil obcaecati vitae accusantium magnam aliquid fugit, inventore quidem. Autem, repellendus.</p>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing, elit. Necessitatibus perspiciatis tenetur adipisci eligendi veniam eos illo numquam facilis commodi nihil obcaecati vitae accusantium magnam aliquid fugit, inventore quidem. Autem, repellendus.</p>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing, elit. Necessitatibus perspiciatis tenetur adipisci eligendi veniam eos illo numquam facilis commodi nihil obcaecati vitae accusantium magnam aliquid fugit, inventore quidem. Autem, repellendus.</p>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing, elit. Necessitatibus perspiciatis tenetur adipisci eligendi veniam eos illo numquam facilis commodi nihil obcaecati vitae accusantium magnam aliquid fugit, inventore quidem. Autem, repellendus.</p>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing, elit. Necessitatibus perspiciatis tenetur adipisci eligendi veniam eos illo numquam facilis commodi nihil obcaecati vitae accusantium magnam aliquid fugit, inventore quidem. Autem, repellendus.</p>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing, elit. Necessitatibus perspiciatis tenetur adipisci eligendi veniam eos illo numquam facilis commodi nihil obcaecati vitae accusantium magnam aliquid fugit, inventore quidem. Autem, repellendus.</p>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing, elit. Necessitatibus perspiciatis tenetur adipisci eligendi veniam eos illo numquam facilis commodi nihil obcaecati vitae accusantium magnam aliquid fugit, inventore quidem. Autem, repellendus.</p>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing, elit. Necessitatibus perspiciatis tenetur adipisci eligendi veniam eos illo numquam facilis commodi nihil obcaecati vitae accusantium magnam aliquid fugit, inventore quidem. Autem, repellendus.</p>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing, elit. Necessitatibus perspiciatis tenetur adipisci eligendi veniam eos illo numquam facilis commodi nihil obcaecati vitae accusantium magnam aliquid fugit, inventore quidem. Autem, repellendus.</p>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing, elit. Necessitatibus perspiciatis tenetur adipisci eligendi veniam eos illo numquam facilis commodi nihil obcaecati vitae accusantium magnam aliquid fugit, inventore quidem. Autem, repellendus.</p> -->

    <a href="https://www.google.com" target="_blank">Google</a>
</body>
</html>