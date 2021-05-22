using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace CentrumWiedzy.Models
{
    public class Subject
    {
        public int Id { get; set; }
        public string Name { get; set; }
        public string Description { get; set; }

        public int FieldOfStudyId { get; set; }

       public virtual FieldOfStudy FieldOfStudy { get; set; }

        public virtual ICollection<LectuerSubject> LectuerSubjects { get; set; }

        public virtual ICollection<Material> Materials { get; set; }

        public virtual ICollection<SubjectTutor> SubjectTutors { get; set; }
    }
}
