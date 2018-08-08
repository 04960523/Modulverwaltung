select courses.COURSE_ID, courses.COURSE_NAME, students.ID
from courses
   inner join sc_relation
       on sc_relation.COURSE_ID=courses.COURSE_ID
   inner join students
       on students.ID=sc_relation.ID;

