<table>
  <thead>
    <tr>
      <th>Course ID</th>
      <th style="width: 15%">Course Name</th>
      <th style="width: 5%">Number Of Assigned Modules</th>
      <th style="width: 5%">&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($courses as $course) { ?>
      <tr>
        <td><?= $course->courses_id ?></td>
        <td><?= $course->name ?></td>
        <td><?= count($course->courseModules()) ?></td>
        <td>
          <a href="/courses/manageCourse?id=<?= $course->courses_id ?>">Edit Details</a>
          <form method="post" action="/courses/delete" onsubmit="return confirm('Are you sure you want to delete the course <?= $course->name ?>?');">
            <input type="hidden" name="id" value="<?= $course->courses_id ?>" />
            <input type="submit" name="submit" value="Delete" />
          </form>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
