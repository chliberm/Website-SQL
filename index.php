<?php
include 'top.php';
?> 
<main>   
    <h2>Reusable Packaging</h2>
    <!--image of trash-->
    <figure id="right">
        <img alt="Trash" 
            src="images/trash.jpg">
        <figcaption>One (of many) mounds of trash around the globe. <cite>Source: 
            <a href=https://www.istockphoto.com/photos/garbage>https://www.istockphoto.com/photos/garbage</a></cite>
        </figcaption>
    </figure>
    <!--Section describing the issue-->
    <article class="article1">
        <section>
            <h3>What's the <strong>problem</strong>?</h3>
            <p>With such a consumerist society, we have an immense impact on our environment. We all buy 
                hundreds of products just to satisfy our daily needs. What a lot of people don't think about
                is how harmful the packaging that ends up in the landfill really is, and how unnecessarily 
                wasteful it is. So many of these products are package in a single-use container of sorts, 
                when we all can strive to do better for the planet we live on. The trash we have been creating 
                for hundreds of years has been poisoning our environment with toxic pollutants, harms aquatic life, 
                decreases air quality, causes severe health effects in wildlife, and so much more. We can change this. 
                </p>
        </section>
        <!--Table of products and their contribution to waste-->
        <table>
            <caption><strong>Some examples of wasteful products</strong></caption>
            <thead>
                <tr>
                    <th>Products</th>
                    <th>Amount Manufactured per year</th>
                    <th>Decomposition time</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $sql = 'SELECT fldProductName, fldAmount, fldDecompTime FROM tblProducts';

            $statement = $pdo->prepare($sql);
            $statement->execute();

            $records = $statement->fetchAll();

            foreach ($records as $record) {
                print '<tr>';
                print '<td>' . $record['fldProductName'] . '</td>';
                print '<td>' . $record['fldAmount'] . '</td>';
                print '<td>' . $record['fldDecompTime'] . '</td>';
                print '</tr>' . PHP_EOL;
            }
            ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Sources</th>
                    <td colspan="2"><a href=https://www.onegreenplanet.org/lifestyle/things-that-are-super-convenient-but-also-super-wasteful/0>1</a>, 
                    <a href=https://perfectdailygrind.com/2020/08/a-brief-history-of-coffee-pods-nespresso-keurig-capsules>2</a>, 
                    <a href=https://www.conserve-energy-future.com/are-coffee-pods-recyclable.php>3</a>, 
                    <a href=https://www.prnewswire.com/news-releases/cotton-buds-world-industry-report-2018-2026-analysis-by-material-application-and-geography-300675866.html>4</a>, 
                    <a href=https://usegreenco.com/blogs/think-green/do-you-know-how-long-trash-takes-to-decompose>5</a>, 
                    <a href=https://stanfordmag.org/contents/planet-friendly-periods>6</a></td>
                </tr>
            </tfoot>
        </table>
    </article>
    <!--Section offering things an individual can do-->
    <article class="article2">
        <section>
            <h3>What can you do about it?</h3>
            <p>Although the future does not seem hopeful with all the damage that has been done, we should not give up. 
                As an individual, there is much you can still do. Be responsible for your own contribution to the mounds
                of trash, keep looking for ways to reduce your product consumptions, and find companies and products that 
                are multi-use or have reusable packaging. There are so many cases where it is unnecessary to have single-use 
                packaging that gets disposed immediately after the first use. If everyone made the effort to transition to 
                refillable containers and other reusable packaging we could significantly reduce the landfill and hopefully 
                make those harmful single-use packaging obsolete. </p>
        </section>
    </article>
    <aside class="info">
        <section>
                <!--List of companies-->
            <p>Here is a list of a few companies that have reusable packaging:</p>
            <ul> 
                <li>Reusable menstrual cup (e.g. <a href=https://divacup.com>Diva Cup</a>)</li>
                <li>Toothpaste tablets (e.g. <a href=https://bitetoothpastebits.com>Bite</a>)</li>
                <li>Cleaning product tablets and reusable containers (e.g. <a href=https://www.blueland.com>Blueland</a>)</li>
                <li>Source: My knowledge</li>
            </ul>
        </section>
    </aside>
</main>
<?php
include 'footer.php';
?>
</body>
</html>
        