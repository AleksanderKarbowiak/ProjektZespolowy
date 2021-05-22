using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace CentrumWiedzy.Models
{
    public class SubjectTutor
    {
        public int SubjectId { get; set; }
        public Subject Subject { get; set; }
        public int TutorId { get; set; }
        public Tutor Tutor { get; set; }
    }
}
