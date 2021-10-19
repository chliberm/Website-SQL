<?php
include 'top.php';

$topTenStates = array(
    array('Maine', '72%', 'Yes'),
    array('Vermont', '62%', 'Yes'),
    array('Massachusetts', '55%', 'Yes'),
    array('Oregon', '55%', 'Yes'),
    array('Connecticut', '52%', 'Yes'),
    array('New York', '51%', 'Yes'),
    array('Minnesota', '49%', 'No'),
    array('Michigan', '48%', 'Yes'),
    array('New Jersey', '46%', 'No'),
    array('Iowa', '44%', 'Yes')
);
?>
<main>
    <h2>Recycling by State</h2>
    <!--image of trash-->
    <figure id="right">
        <img alt="Trash" 
            src="images/trash.jpg">
        <figcaption>One (of many) mounds of trash around the globe. <cite>Source: 
            <a href=https://www.istockphoto.com/photos/garbage>https://www.istockphoto.com/photos/garbage</a></cite>
        </figcaption>
    </figure>
    <article1>
        <section>
            <h3>There is more to be done</h3>
            <p>
                Although we, as a nation, have come a long way in the reduction of waste and optimization of recycling and reusing there is
                still more to be done. Currently, only 25% of US waste is actually recycled. Waste management and recycling contributes, as 
                of today, to 3% of green house gass emission reduction. In addition to increasing the collection and recycling of different
                materials, recycling needs to be a more holistic packaging, waste and design policies. To acheive that full circle effect,
                we need to maintain the collection of recyclables, their sorting, the actual process of reducing them to usable materials, 
                and the use of those materials to create new ones. Unfortunately, there is a significant gap in the quantity of products 
                collected and those that get process. 
            </p>
            <cite>Source: <a href="https://www.ball.com/getattachment/na/Vision/Sustainability/Real-Circularity/Final-50-States-of-Recycling-Short-Presentation.pdf.aspx?lang=en-US&ext=.pdf">The 50 States of Recycling</a></cite>
        </section> 
    </article1>

    <article2>
        <section>
            <h3>Highlights from a state-by-state report</h3>
            <p>
                The recycling rates vary significantly between the different states in the US. From 62% in Maine to 2% West Virginia. In 
                addition to the variation in recycling rates, the different states also have different characteristics and policies. Out 
                of the top 10 recycling states, 7 have a quality reporting system with well collected and available data. A deposit return
                system ("bottle bill") is instated in 8 of those top 10 states. And most of the top 10 states have higher landfill disposal
                cost on a per ton basis. 
            </p>
            <cite>Source: <a href="https://www.waste360.com/recycling/new-report-ranks-us-states-based-recycling-performance">New Report Ranks U.S. States Based on Recycling Performance</a></cite>
        </section> 
    </article2>
    <aside>
        <section>
            <h3>Top Ten States: (Name, Recycling Rate, Bottle Bill)</h3>
            <ol>
                <?php
                foreach ($topTenStates as $state) {
                    print '<li>';
                    print $state[0]. ', ';
                    print $state[1]. ', ';
                    print $state[2]. ', ';
                    print '</li>';
                }
                ?>
            </ol>
            <p> There are:
                <?php
                echo count($topTenStates)
                ?>
                rows of data
            </p>
            <cite>Source: <a href="https://www.ball.com/getattachment/na/Vision/Sustainability/Real-Circularity/Final-50-States-of-Recycling-Short-Presentation.pdf.aspx?lang=en-US&ext=.pdf">The 50 States of Recycling</a></cite>
        </section>
    </aside>
</main>

<?php
include 'footer.php';
?>
</body>
</html>