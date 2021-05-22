using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace CentrumWiedzy.Models
{
    public class Faculty
    {
        public int Id { get; set; }

        public string Name { get; set; }

        public string Description { get; set; }

        public virtual ICollection<FieldOfStudy> Fields { get; set; }

        public virtual ICollection<FacultyLectuer> FacultyLectuers { get; set; }
    }
}
