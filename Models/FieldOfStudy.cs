using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace CentrumWiedzy.Models
{
    public class FieldOfStudy
    {
        public int Id { get; set; }
        public string Name { get; set; }
        public string Description { get; set; }

        public int FacultyId { get; set; }
        public virtual Faculty Faculty { get; set; }

        public virtual ICollection<Subject> Subjects { get; set; }
    }
}
