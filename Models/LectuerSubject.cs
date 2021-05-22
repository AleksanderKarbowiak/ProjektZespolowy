using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace CentrumWiedzy.Models
{
    public class LectuerSubject
    {
        public int LectuerId { get; set; }
        public Lectuer Lectuer { get; set; }
        public int SubjectId { get; set; }
        public Subject Subject { get; set; }
    }
}
