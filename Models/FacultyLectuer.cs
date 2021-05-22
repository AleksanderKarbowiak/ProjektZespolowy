using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace CentrumWiedzy.Models
{
    public class FacultyLectuer
    {
        public int FacultyId { get; set; }
        public Faculty Faculty { get; set; }
        public int LectuerId { get; set; }
        public Lectuer Lectuer { get; set; }
    }
}
