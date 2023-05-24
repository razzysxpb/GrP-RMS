<?php if(isset($_SESSION['isAdmin'])){ ?>
<button><a href="/courses/addCourse" style ="text-decoration:none; color:black;">Add New Course</a></button>
<?php } ?>
<table style="width:80%;">
  <thead >
    <tr>
      <th style="width: 15%">Course ID</th>
      <th style="width: 30%">Course Name</th>
      <th style="width: 5%">Number Of Assigned Modules</th>
      <th style="width: 15%">&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($courses as $course) { ?>
      <tr>
        <td><?= $course->courses_id ?></td>
        <td><?= $course->name ?></td>
        <td><?= count($course->courseModules()) ?></td>
        <td>
          <?php if (isset($_SESSION['isAdmin'])) { ?>
            <button onclick="window.location.href='/courses/manageCourse?id=<?= $course->courses_id ?>'" class="button">Edit</button>
            <form method="post" action="/courses/delete" onsubmit="return confirm('Are you sure you want to delete <?= $course->name ?>?')">
              <input type="hidden" name="id" value="<?= $course->courses_id ?>" />
              <?php if ($_SESSION['isAdmin']) { ?>
                <button type="submit">Delete</button>
              <?php } ?>
            </form>
          <?php } ?>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
