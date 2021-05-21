using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace SCW.Entities
{
    public class FieldOfStudy
    {
        public int Id { get; set; }
        public string Name { get; set; }
        public string Description { get; set; }

        public int FacultyId { get; set; }
        public virtual Faculty Faculty { get; set; }

        public virtual List<Subject> Subjects { get; set; }
    }
}
