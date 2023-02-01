<ul data-role="listview" data-inset="false" data-filter="false" data-count-theme="b">
    <?php
    $get_projects = $bdd->query(
        "SELECT * FROM tbl_students
    LEFT JOIN tbl_professions ON PKNoProfession = FKNoProfession
    ORDER BY name, firstname"
    );
    while ($student = $get_projects->fetch()) { ?>
    <li data-role="list-divider" role="heading"
        class="ui-li ui-li-divider ui-btn ui-bar-b ui-li-has-count ui-btn-up-undefined">
        <?= $student['name'] . " " . $student['firstname'] ?>
        <span class="ui-li-count ui-btn-up-b ui-btn-corner-all"><?= $student['YearEntree'] ?? "-" ?></span>
    </li>
    </li>
    <?php
    }
    ?>
</ul>