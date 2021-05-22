using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace CentrumWiedzy.Models
{
    public class Material
    {
        public int Id { get; set; }
        public string Link { get; set; }
        public string Name { get; set; }
        public string Description { get; set; }

        public int SubjectId { get; set; }
        public virtual Subject Subject { get; set; }
    }
}
